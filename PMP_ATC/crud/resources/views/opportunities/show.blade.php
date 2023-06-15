
<h1>Opportunity Details</h1>

<p><strong>ID:</strong> {{ $opportunity->id }}</p>
<p><strong>Opportunity Status ID:</strong> {{ $opportunity->opportunity_status_id }}</p>
<p><strong>Proposal:</strong> {{ $opportunity->proposal }}</p>
<p><strong>Initial Stage:</strong> {{ $opportunity->initial_stage }}</p>
<p><strong>Technical Stage:</strong> {{ $opportunity->technical_stage }}</p>

<a href="{{ route('opportunities.index') }}">Back to Opportunities</a>
