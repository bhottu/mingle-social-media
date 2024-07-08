document.addEventListener('DOMContentLoaded', function() {
    const commentForm = document.getElementById('comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', async function(event) {
            event.preventDefault();
            console.log('Form submitted');

            const content = document.getElementById('comment-content').value;
            const postId = "{{ $post->id }}"; // Pastikan $post tersedia dalam view
            const tokenElement = document.querySelector('meta[name="csrf-token"]');
            if (tokenElement) {
                const token = tokenElement.getAttribute('content');
                console.log('CSRF Token:', token);

                try {   
                    const response = await fetch(`/post/${post}/comment`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({ content: content })
                    });

                    console.log('Response status:', response.status);

                    if (response.ok) {
                        const newComment = await response.json();
                        console.log('New comment:', newComment);
                    } else {
                        console.log('Failed to submit comment');
                    }
                } catch (error) {
                    console.log('Error:', error);
                }
            } else {
                console.log('CSRF token element not found');
            }
        });
    } else {
        console.log('Comment form element not found');
    }
});





function addCommentToSection(comment) {
    const commentsSection = document.getElementById('comments-section');
    console.log('Adding comment to section:', comment);
    const commentElement = document.createElement('div');
    commentElement.classList.add('border-t', 'border-gray-200', 'mt-2', 'pt-2');
    commentElement.innerHTML = `
        <p>${comment.content}</p>
        <p class="text-sm text-gray-600">By ${comment.user.name} on ${comment.created_at}</p>
    `;
    commentsSection.appendChild(commentElement);
}

async function fetchComments(postId) {
    const response = await fetch(`/comments/${postId}`);
    const comments = await response.json();
    const commentsSection = document.getElementById('comments-section');
    commentsSection.innerHTML = '';

    comments.forEach(comment => {
        addCommentToSection(comment);
    });
}

// popup
function openImagePopup(imageUrl, postId) {
    document.getElementById('image-popup').classList.remove('hidden');
    document.getElementById('image-popup-img').src = imageUrl;
    fetchComments(postId);
}

function closeImagePopup() {
    document.getElementById('image-popup').classList.add('hidden');
    document.getElementById('image-popup-img').src = '';
    document.getElementById('comments-section').innerHTML = '';
}
// popup