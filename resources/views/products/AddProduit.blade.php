<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="produitForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Titre</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-user"></i
                    ></span>
                    <input
                      type="text"
                      class="form-control"
                      id="titre"
                      name="titre"
                      placeholder="John Doe"
                      aria-label="John Doe"
                      aria-describedby="basic-icon-default-fullname2"
                    />
                  </div>
                  {{-- titre error --}}
                  <span class="text-danger">
                    <strong id="titre-error"></strong>
                </span>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-fullname">Categorie</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class='bx bx-category'></i></span>
                    <select class="form-select" id="categorie" name="categorie" aria-label="Default select example">
                      <option selected>select a category</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->nom }}</option>
                      @endforeach
                    </select>
                  </div>
                  {{-- categorie error --}}
                  <span class="text-danger">
                    <strong id="categorie-error"></strong>
                </span>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">description</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-message2" class="input-group-text"
                        ><i class="bx bx-comment"></i
                      ></span>
                      <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        placeholder="Hi, Do you have a moment to talk Joe?"
                        aria-label="Hi, Do you have a moment to talk Joe?"
                        aria-describedby="basic-icon-default-message2"
                      ></textarea>
                    </div>
                    {{-- description error --}}
                    <span class="text-danger">
                      <strong id="description-error"></strong>
                  </span>
                  </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-company">prix</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"
                      ><i class='bx bx-purchase-tag' ></i></span>
                    <input
                      type="text"
                      id="prix"
                      name="prix"
                      class="form-control"
                      placeholder="ACME Inc."
                      aria-label="ACME Inc."
                      aria-describedby="basic-icon-default-company2"
                    />
                  </div>
                  {{-- prix error --}}
                  <span class="text-danger">
                    <strong id="prix-error"></strong>
                </span>
                </div>
              
                <div class="mb-3">
                  <label class="form-label" for="basic-icon-default-phone">image</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"
                      ><i class='bx bx-image-add' ></i></span>
                    <input class="form-control" type="file" id="image" name="image"/>

                  </div>
                  {{-- image error --}}
                  <span class="text-danger">
                    <strong id="image-error"></strong>
                </span>
                </div>
               
                <button type="submit" class="btn btn-primary" style="float: right">Send</button>
              </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
  @include('Products.ProduitFunction')