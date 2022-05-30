<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupLabel">You Have to pay to Connect !!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
                
                <div class="modal-body">
                    {{-- <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        @if ($errors->has('profile_image'))
                            <span class="text-sm text-danger">{{ $errors->first('profile_image') }}</span>
                        @endif
                        <label for="email">Profile Image</label>
                        <input type="file" id="profile_image" name="profile_image" class="form-control" >
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            
        </div>
    </div>
</div>
