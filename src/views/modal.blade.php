<div id="flash-overlay-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">{{ $title }}</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <p>{!! $body !!}</p>
        </section>
        <footer class="modal-card-foot">
            <button class="button">Close</button>
        </footer>
    </div>
</div>
