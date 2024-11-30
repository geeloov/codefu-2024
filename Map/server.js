import cors from 'cors';
import express from 'express';

const app = express();

app.use(cors({
    origin: ['http://localhost:8000','https://5580-79-126-135-21.ngrok-free.app/'],
}));

app.get('/api/sensors', async (req, res) => {
    try {
        const response = await fetch('https://skopje.pulse.eco/rest/current');
        const data = await response.json();
        res.setHeader('Access-Control-Allow-Origin', '*');
        res.json(data);
    } catch (error) {
        res.status(500).send('Error fetching data from the API');
    }
});

app.listen(3000, () => {
    console.log('Proxy server running at http://localhost:3000');
});