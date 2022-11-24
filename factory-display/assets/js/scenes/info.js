const portBtn = document.querySelector('#portBtn');
const landBtn = document.querySelector('#landBtn');

const portrait = document.querySelector('#portrait');
const landscape = document.querySelector('#landscape');

const nextBtn = document.querySelector('#nextBtn');

//! console.log(portBtn);
//! console.log(landBtn);
//! console.log(portrait);
//! console.log(landscape);

//* Function to select portrait orientation
function selecPort (){
  portrait.className='active-orientation';
  landscape.className='inactive-orientation';
  selectOrientation('portrait');
  //! console.log('portrait');
};

//* Function to select landscape orientation
function selecLand (){
  portrait.className='inactive-orientation';
  landscape.className='active-orientation';
  selectOrientation('landscape');
  //! console.log('landscape');
};

//* Function to go to the second view
function nextScene (){
  getName();
  loadSecondView();
};

portBtn.addEventListener('click', selecPort)
landBtn.addEventListener('click', selecLand) 

nextBtn.addEventListener('click', nextScene)
