function getLocation() {
  city = "vierzon";
  API_KEY = "0980797e442d5d932a662b2c1f46e67e";
  url =
    "http://api.openweathermap.org/data/2.5/weather?q=" +
    city +
    "&appid=" +
    API_KEY;
  console.log(url);

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            const weather = document.querySelector("#weather");
            weatherDesc = data.weather[0].description;
            weatherImg = "sunny";

            if(weatherDesc === "clear sky") {
              weatherDesc = "Ensoleillé";
              weatherImg = "sunny";
            } else if(weatherDesc === "few clouds") {
              weatherDesc = "Peu nuageux";
              weatherImg = "few_clouds";
            } else if(weatherDesc === "scattered clouds") {
              weatherDesc = "Nuageux";
              weatherImg = "clouds";
            } else if(weatherDesc === "broken clouds" || weatherDesc === "overcast clouds") {
              weatherDesc = "Très nuageux";
              weatherImg = "clouds";
            } else if(weatherDesc === "shower rain") {
              weatherDesc = "Averse";
              weatherImg = "rain";
            } else if(weatherDesc === "rain") {
              weatherDesc = "Pluvieux";
              weatherImg = "few_rain";
            } else if(weatherDesc === "thunderstorm") {
              weatherDesc = "Orageux";
              weatherImg = "thunder";
            } else if(weatherDesc === "snow") {
              weatherDesc = "Neige";
              weatherImg = "snow";
            } else if(weatherDesc === "mist") {
              weatherDesc = "Brumeux";
              weatherImg = "clouds";
            }

            weather.innerHTML = `
            <div class="weather__location"><h1>Vierzon, ${data.sys.country}</h1></div>
                <div class="weather__temp">${Math.round(data.main.temp - 273.15)}°C</div>
                <div class="weather__description">${weatherDesc}</div>
                  <div class="weather__feels_like">Ressenti: ${Math.round(data.main.feels_like - 273.15)}°C</div>
                <div class="weather__icon">
                  <img src="/screens-side/assets/img/weather/animated/${weatherImg}.svg" alt="weather icon">
                </div>
                <div class="bar_container">
                  <div class="weather__humidity"><img src="/screens-side/assets/img/weather/humidity.png" alt="">
                    ${data.main.humidity}%
                  </div>
                    <div class="progress_bar humidity"></div>
                  <div class="weather__humidity"><img src="/screens-side/assets/img/weather/transparent.png" alt=""></div>
                </div>
                <div class="bar_container">
                  <div class="weather__sunrise"><img src="/screens-side/assets/img/weather/sunrise.png" alt="">
                    ${new Date(data.sys.sunrise * 1000).toLocaleTimeString().slice(0, -3)+1}
                  </div>
                  <div class="progress_bar schedules"></div>
                  <div class="weather__sunset">
                    <img src="/screens-side/assets/img/weather/sunset.png" alt="">
                    ${new Date(data.sys.sunset * 1000).toLocaleTimeString().slice(0,-3)+1}
                  </div>
                </div>
                  <div class="bar_container">
                  <div class="weather__temp_min"><img src="/screens-side/assets/img/weather/min_temp.png" alt=""> ${Math.round(data.main.temp_min - 273.15)}°C</div>
                  <div class="progress_bar min_max">
                  </div>

                  <div class="weather__temp_max"><img src="/screens-side/assets/img/weather/max_temp.png" alt=""> ${Math.round(data.main.temp_max - 273.15)}°C</div>
                </div>
            `;
        });
}

getLocation();
setInterval(getLocation, 30000);
