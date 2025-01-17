<style>
     .modal-content-popap {
    position: relative;
    background-color: #fefefe;
    margin: 40px auto;
    padding: 20px;
    border: 1px solid #888;
    width: 100%;
  }
</style>

<!-- Finance- Pop Up Modal Start -->
<section id="myModal" class="modal">
    <div class="modal-content">
        <div id="popup-modal">
            <form id="signup" onsubmit="return Save(event)">
                <div class="modal-title">
                    <h1>Create Product</h1>
                    <span class="close-btn close" onclick="closeModal()">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
                <div class="row">
                    <!-- Brand Input with Plus Icon -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Brand <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-select input-style" id="ProductBrand"
                            aria-label="Default select example">
                            <option value="none">Select Brand</option>
                        </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addBrandModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Category Input with Plus Icon -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-select input-style" id="ProductCategory" aria-label="Default select example">
                                <option value="none" selected>Select Category</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Unit Input with Plus Icon -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Unit <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-select input-style" id="ProductUnit"
                                            aria-label="Default select example">
                                            <option value="none">Select Unit</option>
                                        </select>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addUnitModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="d-flex align-items-center mt-3">
                            <img class="mb-4 me-3" id="newImg" style="width: 80px" src="{{asset('images/default.jpg')}}" />
                            <div>
                                <label class="form-label">Photo</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])"
                                    type="file" class="form-control" id="ProductImage">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" class="input-style" class="input-style" name="name" id="ProductName" /><br />
                    </div>


                    <div class="col-md-6 mb-4">
                        <label class="form-label">Price <span class="text-danger">*</span></label>
                        <input type="text" class="input-style" name="price" class="input-style" id="ProductPrice" /><br />
                        <input type="hidden" class="input-style" name="quantity" value="0" class="input-style" id="ProductQuantity" /><br />
                    </div>



                    <div class="col-md-6 mb-4">
                        <label class="form-label">Sell Price <span class="text-danger">*</span></label>
                        <input type="text" class="input-style" name="sell_price" class="input-style" id="ProductSell" /><br />
                    </div>



                    <div class="col-md-6 mb-4">
                        <label class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" class="input-style" name="date" class="input-style" id="ProductDate" /><br />
                    </div>



                    <div class="col-md-6 mb-4">
                        <label class="form-label">Code <span class="text-danger">*</span></label>
                        <input type="text" class="input-style" name="code" class="input-style" id="ProductCode" /><br />
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Stock <span class="text-danger">*</span></label>
                        <input type="text" class="input-style" name="stock" class="input-style" id="ProductStock" /><br />
                    </div>


                    <div class="col-lg-6">
                        <label class="country">
                            <label class="form-label">Status<span class="text-danger">*</span></label>
                            <select name="status" class="input-style" id="SelectStatus">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select><br />
                        </label>
                        <div class="upload-profile">
                            <button type="submit" class="submit">Submit</button>
                        </div>
                </div>

                <!-- Modals -->

                <!-- Add Brand Modal -->
                <div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-content-popap">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addBrandModalLabel">Add New Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                  <div class="row">
                    <div class="col-lg-6">
                        <div class="upload-profile">
                            <div class="item">
                                <div class="img-box">
                                    <svg width="32" height="32" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="50" height="50" fill="url(#pattern0_1204_6)" fill-opacity="0.5" />
                                        <defs>
                                            <pattern id="pattern0_1204_6" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_1204_6" transform="scale(0.005)" />
                                            </pattern>
                                            <image id="image0_1204_6" width="200" height="200" />
                                        </defs>
                                    </svg>
                                    <!-- Add an img element for the image preview -->
                                    <img id="BrandimagePreview" style="display:none; max-width:100%; height:auto;" alt="Image Preview" />
                                </div>

                                <div class="profile-wrapper">
                                    <label class="custom-file-input-wrapper">
                                        <input type="file" class="custom-file-input" aria-label="Upload Photo" id="CreateBrandImg"  />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6"></div>

                    <div class="col-lg-6">
                        <label class="data mt-2">
                            <input type="text" name="name" class="input-style" placeholder="Brand name" id="CreateBrandName" /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="country mt-2">
                            <select name="status" class="input-style" id="BrandSelectStatus">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select><br />
                        </label>
                    </div>
                  </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a onclick="BrandSave(event)" id="save-btn" class="btn btn-primary" style="width: auto;">Save Brand</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Category Modal -->
                <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form id="signup" onsubmit="return false;"> <!-- Disable form submit for now -->
                                        <div class="col-lg-6">
                                            <label class="data">
                                                <input type="text" name="category_name" class="input-style" placeholder="Enter your Category name" id="CategoryName" /><br />
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="country">
                                                <select name="status" class="input-style" id="CategorySelectStatus">
                                                    <option value="">Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="InActive">InActive</option>
                                                </select><br />
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- Changed Save Category button as per your request -->
                                <a onclick="CategorySave(event)" id="save-btn" class="btn btn-primary" style="width: auto;">Save</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Unit Modal -->
                <div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content modal-content-popap">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addUnitModalLabel">Add New Unit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="data">
                                            <input type="text" name="unit_name" placeholder="Enter your Unit name" id="UnitName" /><br />
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="country">
                                            <select name="status" id="UnitSelectStatus">
                                                <option value="">Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="InActive">InActive</option>
                                            </select><br />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a onclick="UnitSave(event)" id="save-btn" class="btn btn-primary" style="width: auto;">Save Unit</a>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</section>
<!-- Finance- Pop Up Modal End -->




<script>

    document.getElementById('CreateBrandImg').addEventListener('change', function (event) {
        const imgFile = event.target.files[0];
        const BrandimgPreview = document.getElementById('BrandimagePreview');

        if (imgFile) {
            const reader = new FileReader();
            reader.onload = function (e) {
                BrandimgPreview.src = e.target.result; // Set the image source to the file data
                BrandimgPreview.style.display = 'block'; // Show the image preview
            }
            reader.readAsDataURL(imgFile); // Read the file as a data URL
        } else {
            BrandimgPreview.src = ""; // Clear the preview if no file is selected
            BrandimgPreview.style.display = 'none'; // Hide the preview
        }
    });

    async function BrandSave(event) {
    event.preventDefault();
    try {
        let CreateBrandName = document.getElementById('CreateBrandName').value;
        let BrandSelectStatus = document.getElementById('BrandSelectStatus').value;
        let imgInput = document.getElementById('CreateBrandImg');
        let imgFile = imgInput.files[0];

        // Validation
        if (CreateBrandName.length === 0) {
            errorToast("Brand Name Required !");
            return; // Exit the function if validation fails
        } else if (BrandSelectStatus.length === 0) {
            errorToast("Status Required !");
            return;
        } else if (!imgFile) {
            errorToast("Photo is required!");
            return;
        }

        // Creating form data for submission
        let formData = new FormData();
        formData.append('name', CreateBrandName);
        formData.append('status', BrandSelectStatus);
        formData.append('img_url', imgFile); // Append image file

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        }

        // Sending the form data to the server
        let res = await axios.post("/api/create-brand", formData, config);

        if (res.data['status'] === "success") {
            successToast(res.data['message']);
            document.getElementById("signup").reset();  // Reset form
            const modal = document.getElementById('addBrandModal');
            const modalInstance = bootstrap.Modal.getInstance(modal);
            modalInstance.hide(); // Close the modal smoothly

            // Refresh the brand list dynamically
            await refreshBrandList();
        } else {
            errorToast(res.data['message']);
        }
    } catch (e) {
        unauthorized(e.response.status);  // Handle authorization issues
    }
}


    </script>



<script>
async function CategorySave(event) {
    event.preventDefault();  // Stop the form from submitting and reloading the page

    try {
        let CategoryName = document.getElementById('CategoryName').value;
        let CategorySelectStatus = document.getElementById('CategorySelectStatus').value;

        // Basic validation
        if (CategoryName.length === 0) {
            errorToast("Category Name Required!");
            return false;
        } else if (CategorySelectStatus === '' || CategorySelectStatus === 'Select Status') {
            errorToast("Status Required!");
            return false;
        }

        // Prepare form data
        let formData = new FormData();
        formData.append('category_name', CategoryName);
        formData.append('status', CategorySelectStatus);

        // Axios request configuration
        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        // Send the POST request to create a new category
        let res = await axios.post("/api/create-category", formData, config);

        if (res.data['status'] === "success") {
            successToast(res.data['message']);
            document.getElementById("signup").reset();

            // Close the modal after saving
            const modal = document.getElementById('addCategoryModal');
            const modalInstance = bootstrap.Modal.getInstance(modal);
            modalInstance.hide();

            // Refresh the category list dynamically without reloading
            await refreshCategoryList();

        } else {
            errorToast(res.data['message']);
        }
    } catch (e) {
        unauthorized(e.response.status);
    }
    return false;
}
</script>



<script>
    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none'; // Hide the modal
    }

    async function UnitSave(event) {
    event.preventDefault();  // Stop form from submitting and reloading the page
    try {
        let UnitName = document.getElementById('UnitName').value;
        let UnitSelectStatus = document.getElementById('UnitSelectStatus').value;

        // Validate the inputs
        if (UnitName.length === 0) {
            errorToast("Unit Name Required!");
            return false;
        } else if (UnitSelectStatus === '' || UnitSelectStatus === 'Select Status') {
            errorToast("Status Required!");
            return false;
        }

        // Create form data to submit
        let formData = new FormData();
        formData.append('unit_name', UnitName);
        formData.append('status', UnitSelectStatus);

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        // Send the POST request to create a new unit
        let res = await axios.post("/api/create-unit", formData, config);

        if (res.data['status'] === "success") {
            successToast(res.data['message']);
            document.getElementById("signup").reset();  // Reset form

            const modal = document.getElementById('addUnitModal');
            const modalInstance = bootstrap.Modal.getInstance(modal);
            modalInstance.hide();

            // Refresh the unit list dynamically without reloading
            await refreshUnitList();  // Call the function to refresh the list
        } else {
            errorToast(res.data['message']);
        }
    } catch (e) {
        unauthorized(e.response.status);
    }
    return false;
}

</script>




<script>
    refreshBrandList();
    refreshCategoryList();
    refreshUnitList();
    refreshSupplierList();


    async function refreshBrandList() {
    try {
        let res = await axios.get("/api/brand-list", HeaderToken());
        let Brand = res.data.BrandData;

        // Build the options for the dropdown
        let optionsHtmlBrand = Brand.map(Brand =>
            `<option value="${Brand.id}">${Brand.name}</option>`
        ).join('');

        // Add the "Select Brand" option as the first option
        optionsHtmlBrand = `<option value="none" selected>Select Brand</option>` + optionsHtmlBrand;

        // Populate the dropdown with the updated brands
        document.getElementById("ProductBrand").innerHTML = optionsHtmlBrand;

    } catch (error) {
        console.error("Error occurred while fetching Brand:", error);
    }
}


    async function refreshCategoryList() {
    try {
        // Fetch the updated category list
        let res = await axios.get("/api/category-list", HeaderToken());

        // Check if the response is successful
        if (res.data.status !== 'success') {
            console.error("Failed to fetch categories:", res.data.message);
            return;
        }

        let Category = res.data.CategoryData;

        // Build the options for the dropdown
        let optionsHtmlCategory = Category.map(category =>
            `<option value="${category.id}">${category.category_name}</option>`
        ).join('');

        // Add the default "Select Category" option at the top
        optionsHtmlCategory = `<option value="none" selected>Select Category</option>` + optionsHtmlCategory;

        // Populate the dropdown with the updated categories
        document.getElementById("ProductCategory").innerHTML = optionsHtmlCategory;

    } catch (error) {
        console.error("Error fetching categories:", error);
    }
}

async function refreshUnitList() {
    try {
        // Make a GET request to fetch the unit list
        let res = await axios.get("/api/unit-list", HeaderToken());

        // Check if the response contains the necessary data
        let Unit = res.data.UnitData;

        // Generate the HTML options from the fetched unit data
        let optionsHtmlUnit = Unit.map(unit =>
            `<option value="${unit.id}">${unit.unit_name}</option>`
        ).join('');

        // Add the default "Select Unit" option at the top
        optionsHtmlUnit = `<option value="none" selected>Select Unit</option>` + optionsHtmlUnit;

        // Update the dropdown with the new options
        document.getElementById("ProductUnit").innerHTML = optionsHtmlUnit;

    } catch (error) {
        console.error("Error occurred while fetching units:", error);
    }
}



// Add Brand
function addBrand() {
    let brandName = document.getElementById('newBrandName').value;
    if (brandName) {
        let selectBrand = document.getElementById('ProductBrand');
        let newOption = document.createElement('option');
        newOption.value = brandName;
        newOption.text = brandName;
        selectBrand.appendChild(newOption);

        // Close the modal after saving
        document.getElementById('newBrandName').value = ''; // Reset input field
        let brandModal = new bootstrap.Modal(document.getElementById('addBrandModal'));
        brandModal.hide();
    }
}

// Add Category
function addCategory() {
    let categoryName = document.getElementById('newCategoryName').value;
    if (categoryName) {
        let selectCategory = document.getElementById('ProductCategory');
        let newOption = document.createElement('option');
        newOption.value = categoryName;
        newOption.text = categoryName;
        selectCategory.appendChild(newOption);

        document.getElementById('newCategoryName').value = '';
        let categoryModal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
        categoryModal.hide();
    }
}

// Add Unit
function addUnit() {
    let unitName = document.getElementById('newUnitName').value;
    if (unitName) {
        let selectUnit = document.getElementById('ProductUnit');
        let newOption = document.createElement('option');
        newOption.value = unitName;
        newOption.text = unitName;
        selectUnit.appendChild(newOption);

        document.getElementById('newUnitName').value = '';
        let unitModal = new bootstrap.Modal(document.getElementById('addUnitModal'));
        unitModal.hide();
    }
}




    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none'; // Hide the modal
    }

    async function Save(event) {
        event.preventDefault(); // Stop form from submitting and reloading the page
        try {
            let ProductBrand = document.getElementById('ProductBrand').value;
            let ProductCategory = document.getElementById('ProductCategory').value;
            let ProductUnit = document.getElementById('ProductUnit').value;
            let ProductName = document.getElementById('ProductName').value;
            let ProductPrice = document.getElementById('ProductPrice').value;
            let ProductQuantity = document.getElementById('ProductQuantity').value;
            let ProductSell = document.getElementById('ProductSell').value;
            let ProductDate = document.getElementById('ProductDate').value;
            let ProductCode = document.getElementById('ProductCode').value;
            let ProductStock = document.getElementById('ProductStock').value;
            let SelectStatus = document.getElementById('SelectStatus').value;
            let imgInput = document.getElementById('ProductImage');
            let imgFile = imgInput.files[0];

            if (ProductBrand.length === 0) {
                errorToast("Product Brand Required!");
                return false;
            } else if (ProductCategory.length === 0) {
                errorToast("Product Category Required!");
                return false;
            } else if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Product Photo Required !");
                return;
            } else {
                let formData = new FormData();
                formData.append('brand_id', ProductBrand);
                formData.append('category_id', ProductCategory);
                formData.append('unit_id', ProductUnit);
                formData.append('name', ProductName);
                formData.append('price', ProductPrice);
                formData.append('quantity', ProductQuantity);
                formData.append('sell_price', ProductSell);
                formData.append('date', ProductDate);
                formData.append('status', SelectStatus);
                formData.append('code', ProductCode);
                formData.append('stock', ProductStock);
                formData.append('img', imgFile);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                };

                let res = await axios.post("/api/create-product", formData, config);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("signup").reset();
                    const modal = document.getElementById('myModal');
                    closeModal(modal); // Close the modal smoothly

                    await getList(); // Refresh the list after creation
                } else {
                    errorToast(res.data['message']);
                }
            }
        } catch (e) {
            unauthorized(e.response.status);
        }
        return false;
    }
</script>

