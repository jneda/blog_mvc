const getCommentsButton = document.querySelector('#ajax-comments');

function makeCommentCard(commentData) {
  // bootstrap outer structure
  const row = document.createElement('div');
  row.classList.add(['row', 'my-3']);

  const col = document.createElement('div');
  col.classList.add(['col-lg-8', 'offset-lg-2'])

  const card = document.createElement('div');
  card.classList.add(['card']);

  const cardBody = document.createElement('div');
  cardBody.classList.add(['card-body']);

  row.appendChild(col);
  col.appendChild(card);
  card.appendChild(cardBody);

  // card body content
  const commentInfo = document.createElement('p');
  commentInfo.classList.add('comment-author');
  const authorText = document.createTextNode('par ');
  commentInfo.appendChild(authorText);
  const authorStrong = document.createElement('strong');
  const authorName = document.createTextNode(`${commentData.author.username}`);
  authorStrong.appendChild(authorName);
  commentInfo.appendChild(authorStrong);
  const dateSpan = document.createElement('span');
  dateSpan.classList.add('text-muted');
  const dateText = document.createTextNode(`- ${commentData.comment.date}`);
  dateSpan.appendChild(dateText);
  commentInfo.appendChild(dateSpan);

  const commentContent = document.createElement('p');
  commentContent.classList.add('card-text');
  commentContent.style.whiteSpace = 'pre-wrap';
  const commentText = document.createTextNode(`${commentData.comment.content}`);
  commentContent.appendChild(commentText);

  card.appendChild(commentInfo);
  card.appendChild(commentContent);

  // fingers crossed
  row.appendChild(card);
  document.body.appendChild(row);
}

function requestListener() {
  const commentsData = JSON.parse(this.responseText);

  // update DOM

  for (const commentData of commentsData) {
    // console.log(commentData);
    makeCommentCard(commentData);
  }
}

function getComments(event) {
  const postId = event.target.dataset.postId;
  if (!postId) {
    console.log('invalid id');
    return;
  }
  // console.log(`fetching comments for post #${postId}`);

  const request = new XMLHttpRequest();
  request.addEventListener('load', requestListener);
  request.open('GET', `getComments.php?id=${postId}`);
  request.send();
  // console.log('request sent');
}

getCommentsButton.addEventListener('click', getComments);