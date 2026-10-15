<!-- partials/events.blade.php -->
<!-- This file combines the timeline (event) section already created as 'timeline.blade.php' -->
<!-- We simply include the timeline partial for backward compatibility, but keep a separate file for future customizations -->
<section id="event" class="bg-white border-y "
    >
    @include('partials.timeline', ['events' => $events, 'invitation' => $invitation])
</section>
