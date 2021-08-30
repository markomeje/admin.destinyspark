<?php if(!empty($posts)): ?>
    	<?php foreach($posts as $post): ?>
    		<?php $id = empty($post->id) ? 0 : $post->id; ?>
	    	var addPostImageButton = document.querySelector('.add-post-image-<?= $id; ?>');
	    	var caller = addPostImageButton.attr('data-id');
		    var uploadInput = document.querySelector('.post-image-input-'+caller+);
		    if (addPostImageButton && uploadInput) {
		    	addPostImageButton.addEventListener('click', () => {
		            uploadInput.click();
		        });

		    	uploadInput.addEventListener('change', (event) => {
		    	    var files = event.target.files
		    		var formData = new FormData();
		    		formData.append('blogimage<?= $id; ?>', files[0]);
                    
		    		var imagePreview = document.querySelector('.post-image-preview-<?= $id; ?>');            
		            imagePreview.file = files[0];    
		            var reader = new FileReader();
		            reader.onload = ((picture) => { 
		                return ((event) => { 
		                    picture.src = event.target.result; 
		                });
		            })(imagePreview);
		            reader.readAsDataURL(files[0]);
		    		// fetch(addPostImageButton.getAttribute('data-url'), {method: 'post', body: formData}).then(response => response.json()).then(data => { 
		    		// 	console.log(data);
		    		// });
		    	});
		    }
		<?php endforeach; ?>
	<?php endif; ?>