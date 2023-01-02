const getCommentsButton = document.querySelector('#ajax-comments');

function requestListener() {
  const commentsData = JSON.parse(this.responseText);
  console.log(commentsData);
}

function getComments(event) {
  const postId = event.target.dataset.postId;
  console.log(`fetching comments for post #${postId}`);

  const request = new XMLHttpRequest();
  request.addEventListener('load', requestListener);
  request.open('GET', `getComments.php?id=${postId}`);
  request.send();
}

getCommentsButton.addEventListener('click', getComments);