<?php


namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model\User;
use Illuminate\Support\Facades\Hash;

class MicrosoftController extends Controller
{

    public function redirectToProvider(Request $request)
{
    $clientId = env('MICROSOFT_GRAPH_CLIENT_ID');
    $redirectUri = env('MICROSOFT_GRAPH_REDIRECT_URI');
    $authority = 'https://login.microsoftonline.com/common';

    // Store the intended URL in the session
    // session(['url.intended' => $request->headers->get('referer')]);

    $authUrl = $authority . '/oauth2/v2.0/authorize?' . http_build_query([
        'client_id' => $clientId,
        'response_type' => 'code',
        'redirect_uri' => $redirectUri,
        'response_mode' => 'query',
        'scope' => 'openid profile User.Read',
        'state' => 'some_state'
    ]);

    return redirect()->away($authUrl);
}


    public function handleProviderCallback(Request $request)
{
    $clientId = env('MICROSOFT_GRAPH_CLIENT_ID');
    $clientSecret = env('MICROSOFT_GRAPH_CLIENT_SECRET');
    $redirectUri = env('MICROSOFT_GRAPH_REDIRECT_URI');
    $authority = 'https://login.microsoftonline.com/common';

    $authCode = $request->input('code');
    $httpClient = new \GuzzleHttp\Client();

    $response = $httpClient->post($authority . '/oauth2/v2.0/token', [
        'form_params' => [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'authorization_code',
            'code' => $authCode,
            'redirect_uri' => $redirectUri,
            'scope' => 'User.Read'
        ]
    ]);

    $accessToken = json_decode((string) $response->getBody())->access_token;

    $graph = new Graph();
    $graph->setAccessToken($accessToken);
    $user = $graph->createRequest("GET", "/me")
        ->setReturnType(User::class)
        ->execute();

    $existingUser = UserModel::where('email', $user->getMail())->first();

    if ($existingUser) {
        // Existing user, log them in
        auth()->login($existingUser);

        if ($existingUser->profile) {
            // User has a profile, redirect to dashboard
            return redirect()->intended('/dashboard');
        } else {
            // User doesn't have a profile, redirect to create profile page
            return redirect()->intended('/profiles/create');
        }
    } else {
        // User not found in the database
        return redirect()->back()->withErrors([
            'email' => 'Invalid email.',
        ]);
    }
}

}