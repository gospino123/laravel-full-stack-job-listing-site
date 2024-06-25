<h2>
  {{ $job->title }}
</h2>
<p>
  Congrats! Your job is live!
</p>
<p>
  <a href="{{url('/jobs/' . $job->id)}}">View Listing for {{ $job->title }}</a>
</p>