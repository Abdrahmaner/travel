<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="card-body">
                    <form  method="" id="editctgForm" enctype="multipart/form-data"  >
                      @csrf
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nom1" name="nom1" placeholder="John Doe" />
                          <input type="hidden" id="idCtg" class="form-control"  />
                          {{-- nom error --}}
                         <span class="text-danger">
                            <strong id="nom-error"></strong>
                        </span>
                        </div>
                      </div>
                    
                      <div class="row mb-3">
                        <div class="mb-3">
                           
                            <label for="formFile" class="form-label">Image</label>
                             {{-- display old image --}}
                             <div class="col-sm-10 " id='imagePreview'>
                                <img src="" alt="Aleq" width="100" id="imageCtg" height="100" /> 
                            </div>
                            {{-- end --}}
                            <input class="form-control" type="file" id="image1"  name="image1"/>
                         {{-- image error --}}
                         <span class="text-danger">
                            <strong id="image-error"></strong>
                        </span>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary edit">Save changes</button>
                    </form>
                  </div>
              </div>
              
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>