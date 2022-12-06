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
            switch (weatherDesc) {
                case "clear sky":
                    weatherDesc = "ensoleillé";
                    break;
                case "few clouds":
                    weatherDesc = "peu nuageux";
                    break;
                case "scattered clouds":
                    weatherDesc = "nuageux";
                    break;
                case "broken clouds":
                    weatherDesc = "très nuageux";
                    break;
                case "shower rain":
                    weatherDesc = "pluie";
                    break;
                case "rain":
                    weatherDesc = "pluie";
                    break;
                case "thunderstorm":
                    weatherDesc = "orage";
                    break;
                case "snow":
                    weatherDesc = "neige";
                    break;
                case "mist":
                    weatherDesc = "brume";
                    break;
                default:
                    weatherDesc = "ensoleillé";
            }
            weather.innerHTML = `
                <div class="weather__location">Vierzon ${data.sys.country}</div>
                <div class="weather__temp">${Math.round(data.main.temp - 273.15)}°C</div>
                <div class="weather__description">${weatherDesc}</div>
                <div class="weather__icon"><img src="http://openweathermap.org/img/w/${data.weather[0].icon}.png" alt="weather icon"></div>
                <div class="weather__humidity">Humidité: ${data.main.humidity}%</div>
                
                <div class="weather__sunrise"><img src="/factory-display/assets/img/icons/sunrise.png" alt=""> ${new Date(data.sys.sunrise * 1000).toLocaleTimeString().slice(0, -3)}</div>
                <div class="weather__sunset"><img src="/factory-display/assets/img/icons/sunset.png" alt=""> ${new Date(data.sys.sunset * 1000).toLocaleTimeString().slice(0,-3)}</div>
                <div class="weather__feels_like">Ressenti: ${Math.round(data.main.feels_like - 273.15)}°C</div>
                <div class="weather__temp_max">Max ${Math.round(data.main.temp_max - 273.15)}°C</div>
                <div class="weather__temp_min">Min: ${Math.round(data.main.temp_min - 273.15)}°C</div>
            `;
        });
}

getLocation();

setInterval(getLocation, 30000);
