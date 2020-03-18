<script src="{{asset('adminpanel/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminpanel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('adminpanel/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminpanel/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('adminpanel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('adminpanel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminpanel/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('adminpanel/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('adminpanel/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('adminpanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('adminpanel/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('adminpanel/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminpanel/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminpanel/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminpanel/dist/js/demo.js')}}"></script>

{{-- adding ckeditor script --}}
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script src="{{asset('adminpanel/dist/js/jquery.min.js')}}"></script>
<script src="{{asset('adminpanel/dist/js/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="{{asset('js/dropzone.js')}}"></script>


<script>
Dropzone.options.myDropzone = {
    paramName     : "file", // The name that will be used to transfer the file
    maxFilesize   : 2, // MB
    maxFiles: 100,
    autoProcessQueue: false,   //tell to dropzone not upload files automatically
    uploadMultiple: true,
    parallelUploads: 100,
    addRemoveLinks: true,
    acceptedFiles : 'image/*',
    previewsContainer: '#dropzonePreview',
    clickable: '#clickable',

     // The setting up of the dropzone
  init: function() {
    var myDropzone = this;

    // First change the button to actually tell Dropzone to process the queue.  input[type=submit]
    this.element.querySelector("#add").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      if (myDropzone.getUploadingFiles().length === 0 && myDropzone.getQueuedFiles().length === 0) {
            location.href = "{{ route('admin.products.index')}}";
        }
        else {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        }
    //   e.preventDefault();
    //   e.stopPropagation();
    //   myDropzone.processQueue();
    });


    this.on('sending', function(file, xhr, formData) {
            // Append all form inputs to the formData Dropzone will POST
            var data = $('#myDropzone').serializeArray();
            $.each(data, function(key, el) {
                formData.append(el.name, el.value);
            });
    });
        // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
    // of the sending event because uploadMultiple is set to true.
    this.on("sendingmultiple", function() {
        console.log("Hi, I am sending....");
      // Gets triggered when the form is actually being sent.
      // Hide the success button or the complete form.
    });
    this.on("successmultiple", function(files, response) {
        console.log("Hi, data is sent.");
        window.location.href = "{{ route('admin.products.index')}}";

      // Gets triggered when the files have successfully been sent.
      // Redirect user or notify of success.
    });
    this.on("errormultiple", function(files, response) {
        alert("Hi, there is an error!");

      // Gets triggered when there was an error sending the files.
      // Maybe show form again, and notify user of error
    });


  }
}
</script>

{{-- Add, Edit and Delete Modal's --}}
<script>
$(document).ready(function(){
    $(document).on('click', '#addNewItem', function(){
        $('#modalTitle').text('افزودن محصول جدید');
        $('#add').show('200');
    });

    $(document).on('click', '#add', function(){

    });
});
</script>
