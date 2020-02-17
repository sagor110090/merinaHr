 @if ($message = Session::get('flash_message'))
 <div class="alert alert-success alert-block" id="success-alert">
     <button type="button" class="close" data-dismiss="alert">×</button>
     <strong>{{ $message }}</strong>
 </div>
 @endif

 @push('js')
 <script>
     $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
         $("#success-alert").slideUp(500);
     });
 </script>
 @endpush