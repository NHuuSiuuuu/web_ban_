var imgFeature = document.querySelector(".img-feature");
var imgList = document.querySelectorAll(".list-image img");
var buttonPrev = document.querySelector(".prev");
var buttonNext = document.querySelector(".next");
var currentIndex = 0;
function updateImageIndex(index) {
  // document.querySelectorAll(".list-image div").forEach((item) => {
  //   item.classList.remove("active");
  // });
  currentIndex = index; //gan cho currentIndex bang voi index hien tai
  imgFeature.src = imgList[index].src; //lay ra img co url
  // imgList[index].parentElement.classList.add("active");
  //them class vao element the cha(div) cua the img
}
imgList.forEach((imgElement, index) => {
  imgElement.addEventListener("click", (event) => {
    updateImageIndex(index);
  });
});

buttonPrev.addEventListener("click", () => {
  if (currentIndex == 0) {
    //neu currentIndex dang la 0 => khi click nut button se chuyen index = imgList.length - 1
    currentIndex = imgList.length - 1;
  } else {
    currentIndex--;
  }
  updateImageIndex(currentIndex);
});
buttonNext.addEventListener("click", (event) => {
  if (currentIndex == imgList.length - 1) {
    currentIndex = 0;
  } else {
    currentIndex++;
  }
  updateImageIndex(currentIndex);
});
