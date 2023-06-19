<?php

namespace App\Http\Controllers\Auth;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model\User;
use Illuminate\Support\Facades\Hash;


class MicrosoftController extends Controller
{
    public function redirectToProvider()
    {
        $clientId = env('MICROSOFT_GRAPH_CLIENT_ID');
        $redirectUri = env('MICROSOFT_GRAPH_REDIRECT_URI');
        $authority = 'https://login.microsoftonline.com/common';
        
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
    } else {
        // New user, create an account and log them in
        $newUser = new UserModel();
        $newUser->name = $user->getDisplayName();
        $newUser->email = $user->getMail();
        $newUser->password = Hash::make('your_password_here');
        // Set any additional user data you want to save

        $newUser->save();

        auth()->login($newUser);
    }

    return redirect()->intended('/dashboard');
}

}