<!-- Finance- Pop Up Modal Start -->
<section id="myModal" class="modal">
    <div class="modal-content">
        <div id="popup-modal">
            <form id="signup" onsubmit="return Save(event)">
                <div class="modal-title">
                    <h1>Create Category</h1>
                    <span class="close-btn close" onclick="closeModal()">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="upload-profile">
                            <div class="item">
                                <div class="img-box">
                                    <svg width="32" height="32" viewBox="0 0 50 50" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="50" height="50" fill="url(#pattern0_1204_6)"
                                            fill-opacity="0.5" />
                                        <defs>
                                            <pattern id="pattern0_1204_6" patternContentUnits="objectBoundingBox"
                                                width="1" height="1">
                                                <use xlink:href="#image0_1204_6" transform="scale(0.005)" />
                                            </pattern>
                                            <image id="image0_1204_6" width="200" height="200" />
                                        </defs>
                                    </svg>
                                    <!-- Add an img element for the image preview -->
                                    <img id="imagePreview" style="display:none; max-width:100%; height:auto;"
                                        alt="Image Preview" />
                                </div>

                                <div class="profile-wrapper">
                                    <label class="custom-file-input-wrapper">
                                        <input type="file" class="custom-file-input" aria-label="Upload Photo"
                                            id="CategoryImg" />
                                    </label>
                                    <p>PNG, JPEG or GIF (up to 1 MB)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="data">
                            <input type="text" name="category_name" class="input-style" placeholder="Enter your Category name" id="CategoryName" /><br />
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="country">
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
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Finance- Pop Up Modal End -->

<script>


document.getElementById('CategoryImg').addEventListener('change', function(event) {
        const imgFile = event.target.files[0];
        const imgPreview = document.getElementById('imagePreview');

        if (imgFile) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result; // Set the image source to the file data
                imgPreview.style.display = 'block'; // Show the image preview
            }
            reader.readAsDataURL(imgFile); // Read the file as a data URL
        } else {
            imgPreview.src = ""; // Clear the preview if no file is selected
            imgPreview.style.display = 'none'; // Hide the preview
        }
    });





    // Function to close the modal
    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.style.display = 'none'; // Hide the modal
    }

    async function Save(event) {
        event.preventDefault();  // Stop form from submitting and reloading the page
        try {
            let CategoryName = document.getElementById('CategoryName').value;
            let SelectStatus = document.getElementById('SelectStatus').value;

            let imgInput = document.getElementById('CategoryImg');
            let imgFile = imgInput.files[0];

            if (CategoryName.length === 0) {
                errorToast("Category Name Required!");
                return false;
            } else if (SelectStatus === '' || SelectStatus === 'Select Status') {
                errorToast("Status Required!");
                return false;
            } else {
                let formData = new FormData();
                formData.append('category_name', CategoryName);
                formData.append('status', SelectStatus);
                formData.append('img_url', imgFile); // Append image file

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                };

                let res = await axios.post("/api/create-category", formData, config);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("signup").reset();
                    const modal = document.getElementById('myModal');
            closeModal(modal);  // Close the modal smoothly

                    await getList();  // Refresh the list after creation
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