import express from 'express';
import fetch from 'node-fetch';

const app = express();

app.get('/api/sensors', async (req, res) => {
    try {
        const response = await fetch('https://skopje.pulse.eco/rest/current');
        const data = await response.json();
        res.setHeader('Access-Control-Allow-Origin', '*'); // Allow CORS
        res.json(data);
    } catch (error) {
        res.status(500).send('Error fetching data from the API');
    }
});

app.listen(3000, () => {
    console.log('Proxy server running at http://localhost:3000');
});
