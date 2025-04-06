<div id="message" class=" col-7 offset-3">


    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                {{ $error }}
            </div>
        @endforeach
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            {{ session('error') }}
        </div>
    @endif


</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var message = document.getElementById('message');
            if (message) {
                message.style.transition = 'opacity 1s';
                message.style.opacity = '0';

                // Optional: Remove the element after fade completes
                setTimeout(function() {
                    message.style.display = 'none';
                }, 1000); // Matches the 1s transition duration
            }
        }, 5000); // 5 seconds
        //button 
        var closeButtons = document.querySelectorAll('.close');
        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var alert = this.parentElement;
                alert.style.transition = 'opacity 1s';
                alert.style.opacity = '0';

                // Optional: Remove the element after fade completes
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 1000); // Matches the 1s transition duration
            });
        });
    });
</script>
