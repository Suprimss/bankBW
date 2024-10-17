
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        window.addEventListener('beforeunload', function (e) {
            document.getElementById('Password').value = '';
        });
    </script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> 
        @if(request('action') == 1)
        Setor
        @else
            Tarik
        @endif
        Tunai:</h5>
        <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>
      Konfirmasi Transaksi
      @if(request('action') == 1)
        Setor
        @else
            Tarik
        @endif
        Tunai</h5>
        Untuk Account <strong>{{$acc->name}}</strong> 




        <input value="" type="password" class="form-control" id="Password" aria-describedby="Password" name="Password">
        @error('Password')
                    <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                return false;
            }
        });
    });
});
</script>