const postRowElement = document.querySelector("#post");
const commentContainerElement = document.querySelector("#comment-container");
const postCommentButtonElement = document.querySelector("#post-comment-btn");
const commentFormElement = document.querySelector("form");

function makeCommentCard(commentData) {
  // bootstrap outer structure
  const row = document.createElement("div");
  row.classList.add("row", "my-3");

  const col = document.createElement("div");
  col.classList.add("col-lg-8", "offset-lg-2");

  const card = document.createElement("div");
  card.classList.add("card");

  const cardBody = document.createElement("div");
  cardBody.classList.add("card-body");

  row.appendChild(col);
  col.appendChild(card);
  card.appendChild(cardBody);

  // card body content
  const commentInfo = document.createElement("p");
  commentInfo.classList.add("comment-author");

  const authorText = document.createTextNode("par ");
  commentInfo.appendChild(authorText);

  const authorStrong = document.createElement("strong");
  const authorName = document.createTextNode(`${commentData.author.username}`);

  authorStrong.appendChild(authorName);
  commentInfo.appendChild(authorStrong);

  const dateSpan = document.createElement("span");
  dateSpan.classList.add("text-muted");
  const dateText = document.createTextNode(`- ${commentData.comment.date}`);

  dateSpan.appendChild(dateText);
  commentInfo.appendChild(dateSpan);

  const commentContent = document.createElement("p");
  commentContent.classList.add("card-text");
  commentContent.style.whiteSpace = "pre-wrap";
  const commentText = document.createTextNode(`${commentData.comment.content}`);

  commentContent.appendChild(commentText);

  cardBody.appendChild(commentInfo);
  cardBody.appendChild(commentContent);
  
  row.appendChild(card);
  commentContainerElement.appendChild(row);
}

function requestListener() {
  // console.log(this);
  const commentsData = JSON.parse(this.responseText);

  // update DOM
  commentContainerElement.innerHTML = "";
  for (const commentData of commentsData) {
    // console.log(commentData);
    makeCommentCard(commentData);
  }
}

function getComments() {
  // console.log(postRowElement.dataset);
  const postId = postRowElement.dataset.postId;
  if (!postId) {
    console.log("invalid id");
    return;
  }
  // console.log(`fetching comments for post #${postId}`);

  const request = new XMLHttpRequest();
  request.addEventListener("load", requestListener);
  request.open("GET", `getComments.php?id=${postId}`);
  request.send();
  // console.log('request sent');
}

function submitComment() {
  const postId = postCommentButtonElement.dataset.postId;
  // console.log(`user #${userId} commenting post #${postId}`);
  const formData = new FormData(commentFormElement);
  formData.append("idPost", postId);
  // console.log(formData);

  const request = new XMLHttpRequest();
  request.addEventListener("load", getComments);
  request.open("POST", `http://localhost/blog-mvc/comment.php`);
  request.send(formData);
}

// getCommentsButton.addEventListener('click', getComments);
window.addEventListener("load", getComments);

if (postCommentButtonElement) {
  postCommentButtonElement.addEventListener("click", submitComment);
}
