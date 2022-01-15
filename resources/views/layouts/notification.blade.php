<div class="fixed right-3 top-2 w-1/2 flex justify-end flex-col items-end">

    <script>
        jQuery(document).ready(function($){

    $(".single_notification").fadeIn('slow');
});
    </script>

    @if (Session::has('success'))
    <div class="bg-blue-500 p-5 text-white w-1/3 text-center mb-5 single_notification hidden">
        <p>{{ Session('success') }}</p>
        <small>{{ Session('subtitle') }}</small>
    </div>
    @endif
    @if (Session::has('error'))
    <div class="bg-red-500 p-5 text-white w-1/3 text-center mb-5 single_notification hidden">
        <p>{{ Session('error') }}</p>
    </div>
    @endif


</div>
