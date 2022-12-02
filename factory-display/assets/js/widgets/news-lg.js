const url = "https://newsapi.org/v2/top-headlines?country=fr&apiKey=";
const API_KEY = "42464cbc68ca4ed5b2cc0fe5fa538f46";

const news = document.querySelector(".news");
console.log(url + API_KEY);

fetch(url + API_KEY)
  .then((response) => response.json())
  .then((data) => {
    data.articles.forEach((article) => {
      console.log(article.source.name);
      if (
        article.source.name === "BFMTV" ||
        article.source.name === "Google News"
      ) {
        return;
      } else {
        news.innerHTML += `
                    <div class="news__article">
                        <h2 class="news__source">${article.source.name}</h2>
                        <h3 class="news__title">${article.title}</h3>
                        <p class="news__description">${article.description}</p>
                        <img class="news__image" src="${article.urlToImage}" alt="${article.title}">
                    </div>
                `;
      }
    });
    displayNews();
  });

  // i need to display just one news at the load of the page, and after 5 seconds i want to display the next news
  function displayNews() {
    const seconds = 20 * 1000;
    const news = document.querySelectorAll(".news__article");
    news.forEach((article) => {
      article.style.display = "none";
    });
    news[0].style.display = "flex";
    let i = 0;
    setInterval(() => {
      news[i].style.display = "none";
      i++;
      if (i === news.length) {
        i = 0;
      }
      news[i].style.display = "flex";
    }, seconds);
  }