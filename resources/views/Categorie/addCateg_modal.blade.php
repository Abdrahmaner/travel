<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Add new categorie</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="card-body">
                <form  method="post" id="ctgForm" enctype="multipart/form-data"  >
                  @csrf
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nom</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nom" name="nom" placeholder="John Doe" />
                     {{-- nom error --}}
                     <span class="text-danger">
                        <strong id="nom-error"></strong>
                    </span>
                    </div>
                  </div>
                 
                  <div class="row mb-3">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image"  name="image"/>
                     {{-- image error --}}
                     <span class="text-danger">
                        <strong id="image-error"></strong>
                    </span>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary store">Save changes</button>
                </form>
              </div>
          </div>
          
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-primary store">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
  @include('Categorie.EditCategorie')
  @include('Categorie.Functions')