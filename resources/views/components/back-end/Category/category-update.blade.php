<!-- Brand Update Modal -->
<div id="custom-modal-1" class="custom-modal">
    <div class="custom-modal-content">
        <span class="custom-close">&times;</span>
        <h2>Update Category</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center mt-3">
                    <img class="me-3" style="width: 60px;" id="oldImg"
                         src="{{ asset('images/default.jpg') }}" />
                    <div>
                        <label class="form-label">Photo</label>
                        <input oninput="updatePreview(this)"  type="file" class="form-control" id="UpdateCategoryImage">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4">
                <!-- Category Name Input -->
                <label for="UpdateCategoryName">Category Name</label>
                <input type="text" name="category_name"  placeholder="Update Category Name" class="input-style" id="UpdateCategoryName" class="form-control">
            </div>

            <div class="col-lg-6 mt-4">
                <!-- Status Dropdown -->
                <label for="UpdateCategoryStatus">Status</label>
                <select name="status" id="UpdateCategoryStatus" class="input-style" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Active">Active</option>
                    <option value="InActive">InActive</option>
                </select>
                <input type="hidden" id="updateID">
                <div class="upload-profile mt-4">
                    <button type="button" class="submit btn btn-primary" onclick="Update()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

async function updatePreview(input, imageUrl) {
        const oldImg = document.getElementById('oldImg');

        if (input.files && input.files[0]) {
            oldImg.src = window.URL.createObjectURL(input.files[0]);
        } else if (imageUrl) {
            oldImg.src = imageUrl;
        } else {
            oldImg.src = "{{ asset('images/default.jpg') }}";
        }
    }



    // Function to fill the form when editing
    async function FillUpUpdateForm(id) {
        try {
            // Set the category id in the hidden input
            document.getElementById('updateID').value = id;
            showLoader();

            // Fetch the category data by ID
            let res = await axios.post("/api/category-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();

            // Populate the form with the fetched data
            let data = res.data.rows;
            document.getElementById('UpdateCategoryName').value = data.category_name;
            document.getElementById('UpdateCategoryStatus').value = data.status;
             updatePreview(document.getElementById('UpdateCategoryImage'), data.img_url);

            // Open the modal after filling the form
            const modal = document.getElementById('custom-modal-1');
            openModal(modal);

        } catch (e) {
            unauthorized(e.response.status);
        }
    }

    // Update Category Script
    async function Update() {
        try {
            let UpdateCategoryName = document.getElementById('UpdateCategoryName').value;
            let UpdateCategoryImage = document.getElementById('UpdateCategoryImage').files[0];
            let updateID = document.getElementById('updateID').value;
            let UpdateCategoryStatus = document.getElementById('UpdateCategoryStatus').value;

            // Validate required fields
            if (!UpdateCategoryName || !UpdateCategoryStatus) {
                return errorToast('Please fill out all required fields.');
            }

            // Prepare form data
            let formData = new FormData();
            formData.append('category_name', UpdateCategoryName);
            formData.append('status', UpdateCategoryStatus);
            formData.append('img', UpdateCategoryImage);
            formData.append('id', updateID);

            // Set the request configuration with headers
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers // Add authorization headers
                }
            };

            showLoader(); // Show loader when submitting

            // Make the request to update the category
            let res = await axios.post("/api/update-category", formData, config);
            hideLoader(); // Hide loader after request completion

            if (res.data.status === "success") {
                successToast(res.data.message);
                const updatemodal1 = document.getElementById('custom-modal-1');
                closeModal(updatemodal1);
                await getList(); // Refresh the category list
            } else {
                errorToast(res.data.message);
            }

        } catch (e) {
            unauthorized(e.response.status); // Handle unauthorized or other errors
        }
    }
</script>
