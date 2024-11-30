function showRedZoneModal() {
    const modal = document.getElementById('redZoneModal');
    modal.style.display = 'block';
}

function closeRedZoneModal() {
    const modal = document.getElementById('redZoneModal');
    modal.style.display = 'none';
}
  
async function checkZone(zone) {
  if (zone === 'red') {
    try {
      const response = await fetch('/zone-data');
      const data = await response.json();
      
      const isAvatarHealthy = data.isAvatarHealthy;
      const lastTaskCompletedAgo = data.lastTaskCompletedAgo;

      console.log(zone, isAvatarHealthy, lastTaskCompletedAgo)
      if (lastTaskCompletedAgo > 2) {
        showRedZoneModal();
      }
    } catch (error) {
      console.error('Error fetching zone data:', error);
    }
  }
}

document.querySelector('#cancelBtn').addEventListener('click', function() {
  closeRedZoneModal();
  let currentSrc = document.querySelector('#smoggyImg').getAttribute('href').replace('.png', '');
  console.log(currentSrc);
  document.querySelector('#smoggyImg').setAttribute('href', currentSrc + '-sick.png');
});

document.getElementById('wearMaskBtn').addEventListener('click', function () {
    window.location.href = '/mask-detection';
    closeRedZoneModal();
});

let currentZone = 'red';
checkZone(currentZone);
