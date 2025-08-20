<x-layout title="Add Blog" >

    <style>
        /* Custom styles for the Add Blog page to make inputs look better */
        .add-blog-form {
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        .add-blog-form .form-group {
            margin-bottom: 25px;
        }
        .add-blog-form label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 500;
            color: #111;
        }
        .add-blog-form input[type="text"],
        .add-blog-form input[type="number"],
        .add-blog-form input[type="date"],
        .add-blog-form input[type="file"],
        .add-blog-form textarea,
        .add-blog-form select {
            width: 100%;
            border: 1px solid #ebebeb;
            height: 50px;
            padding-left: 20px;
            font-size: 15px;
            color: #666;
            transition: all 0.3s;
            border-radius: 5px; /* Added rounded corners */
        }
        .add-blog-form textarea {
            height: 120px;
            padding-top: 15px;
            resize: vertical; /* Allow vertical resizing */
        }
        .add-blog-form input[type="text"]:focus,
        .add-blog-form input[type="number"]:focus,
        .add-blog-form input[type="date"]:focus,
        .add-blog-form input[type="file"]:focus,
        .add-blog-form textarea:focus,
        .add-blog-form select:focus {
            border-color: #f7a4a4; /* Highlight on focus */
            outline: none;
        }
        .add-blog-form .primary-btn {
            display: inline-block;
            font-size: 16px;
            padding: 15px 30px;
            border-radius: 5px; /* Added rounded corners */
            background: #f7a4a4;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            transition: all 0.3s;
            border: none; /* Ensure no default button border */
            cursor: pointer;
        }
        .add-blog-form .primary-btn:hover {
            background: #e78282; /* Darker on hover */
        }

        /* Styles for dynamic input fields (ingredients/directions) */
        .dynamic-input-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .dynamic-input-group input {
            flex-grow: 1;
            margin-right: 10px;
            border-radius: 5px; /* Added rounded corners */
        }
        .add-more-btn, .remove-btn {
            background: #f7a4a4; /* Consistent background */
            border: none; /* No border */
            color: #fff; /* White text */
            padding: 8px 12px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
            border-radius: 5px; /* Rounded corners */
            min-width: 35px; /* Ensures button has minimum width */
            text-align: center;
        }
        .add-more-btn:hover, .remove-btn:hover {
            background: #e78282; /* Darker on hover */
        }
        .remove-btn {
            background: #dc3545; /* Red for remove */
        }
        .remove-btn:hover {
            background: #c82333; /* Darker red on hover */
        }

        .section-title h2 {
            margin-bottom: 30px; /* Space below section title */
            padding-bottom: 10px;
            border-bottom: 1px solid #eee; /* Subtle separator */
        }
        .blog-details.spad {
            padding-top: 80px; /* Adjust padding for content section */
            padding-bottom: 80px;
        }
    </style>

    <div class="blog-hero set-bg" data-setbg="{{ asset("img/blog/details/blog-hero.jpg") }}">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="blog__hero__text">
                        <div class="label">New Post</div>
                        <h2>Create New Blog Post</h2>
                        <ul>
                            <li>Share your delicious recipes or insightful articles!</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="section-title text-center">
                            <h2>Blog Details</h2>
                        </div>
                        <form class="add-blog-form" id="addBlogForm" action="{{ route("admin.add.blog") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="blogTitle">Blog Title:</label>
                                <input type="text" id="title" name="blogTitle" placeholder="e.g., Delicious Chocolate Cake Recipe" required>
                            </div>

                            <div class="form-group">
                                <label for="blogCategory">Category/Label:</label>
                                <select id="blogCategory" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="heroImage">Hero Image (for top banner):</label>
                                <input type="file" id="heroImage" name="image" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label for="introductionText">Introduction Text:</label>
                                <textarea id="introductionText" name="introductionText" rows="5" placeholder="A brief introduction to your blog post..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="mainImage">Main Blog Image:</label>
                                <input type="file" id="mainImage" name="mainImage" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label for="mainContent">Main Content:</label>
                                <textarea id="mainContent" name="mainContent" rows="10" placeholder="Write the main body of your blog post here..."></textarea>
                            </div>

                            <hr style="margin: 40px 0;">

                            <div class="section-title text-center mt-5">
                                <h2>Recipe Details (Optional)</h2>
                            </div>

                            <div class="form-group">
                                <label for="serves">Serves:</label>
                                <input type="text" id="serves" name="serves" placeholder="e.g., 4 as a main, 6 as a side">
                            </div>

                            <div class="form-group">
                                <label for="prepTime">Prep Time (minutes):</label>
                                <input type="number" id="prepTime" name="prepTime" placeholder="e.g., 15">
                            </div>

                            <div class="form-group">
                                <label for="cookTime">Cook Time (minutes):</label>
                                <input type="number" id="cookTime" name="cookTime" placeholder="e.g., 30">
                            </div>

                            <div class="form-group">
                                <label>Ingredients:</label>
                                <div id="ingredients-container">
                                    <div class="dynamic-input-group">
                                        <input type="text" name="ingredients[]" placeholder="e.g., 1 cup (240 ml) whole milk">
                                        <button type="button" class="add-more-btn" onclick="addDynamicInput('ingredients-container', 'ingredients[]', 'e.g., 1 cup (240 ml) whole milk')">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Directions:</label>
                                <div id="directions-container">
                                    <div class="dynamic-input-group">
                                        <input type="text" name="directions[]" placeholder="e.g., Combine all ingredients, kneading to form a smooth dough.">
                                        <button type="button" class="add-more-btn" onclick="addDynamicInput('directions-container', 'directions[]', 'e.g., Allow the dough to rise...')">+</button>
                                    </div>
                                </div>
                            </div>

                            <hr style="margin: 40px 0;">

                            <div class="section-title text-center mt-5">
                                <h2>Tags</h2>
                            </div>
                            <div class="form-group">
                                <label for="blogTags">Tags (comma separated):</label>
                                <input type="text" id="blogTags" name="blogTags" placeholder="e.g., Food, Cakes, Baking, Healthy">
                            </div>

                            <div class="form-group text-center mt-5">
                                <button type="submit" class="primary-btn">Submit Blog Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    // Function to add dynamic input fields for ingredients and directions
    function addDynamicInput(containerId, inputName, placeholderText) {
        const container = document.getElementById(containerId);
        const newDiv = document.createElement('div');
        newDiv.className = 'dynamic-input-group';
        newDiv.innerHTML = `
            <input type="text" name="${inputName}" placeholder="${placeholderText}">
            <button type="button" class="remove-btn" onclick="removeDynamicInput(this)">-</button>
        `;
        container.appendChild(newDiv);
    }

    // Function to remove dynamic input fields
    function removeDynamicInput(buttonElement) {
        const parentDiv = buttonElement.parentNode;
        parentDiv.remove();
    }

    // Initialize nice-select for the select dropdown
    $(document).ready(function() {
        $('select').niceSelect();

        // Set current date for the publishDate input
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months start at 0!
        const dd = String(today.getDate()).padStart(2, '0');
        const formattedDate = `${yyyy}-${mm}-${dd}`;
        $('#publishDate').val(formattedDate);

        // Handle form submission (client-side for demonstration)
        $('#addBlogForm').on('submit', function(event) {
            event.preventDefault(); // Prevent actual form submission

            // You would typically collect form data here and send it to a backend
            // For now, we'll just show a success message.
            alert('Blog post submitted successfully! (This is a client-side demo. Data is not saved.)');

            // Optionally, clear the form after submission
            this.reset();
            // Re-initialize nice-select if needed after reset (for select elements)
            $('select').niceSelect('destroy'); // Destroy current instance
            $('select').niceSelect(); // Re-initialize
            // Reset dynamic fields to one initial input
            $('#ingredients-container').html(`<div class="dynamic-input-group">
                <input type="text" name="ingredients[]" placeholder="e.g., 1 cup (240 ml) whole milk">
                <button type="button" class="add-more-btn" onclick="addDynamicInput('ingredients-container', 'ingredients[]', 'e.g., 1 cup (240 ml) whole milk')">+</button>
            </div>`);
            $('#directions-container').html(`<div class="dynamic-input-group">
                <input type="text" name="directions[]" placeholder="e.g., Combine all ingredients, kneading to form a smooth dough.">
                <button type="button" class="add-more-btn" onclick="addDynamicInput('directions-container', 'directions[]', 'e.g., Allow the dough to rise...')">+</button>
            </div>`);
            $('#publishDate').val(formattedDate); // Set date again after reset
        });
    });
</script>

</x-layout>