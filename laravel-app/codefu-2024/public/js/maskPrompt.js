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
      if (isAvatarHealthy==false && lastTaskCompletedAgo > 2) {
        showRedZoneModal();
      }
    } catch (error) {
      console.error('Error fetching zone data:', error);
    }
  }
}

document.getElementById('cancelBtn').addEventListener('click', closeRedZoneModal);
document.getElementById('wearMaskBtn').addEventListener('click', function () {
    window.location.href = '/mask-detection';
    closeRedZoneModal();
});

let currentZone = 'red';
checkZone(currentZone);
