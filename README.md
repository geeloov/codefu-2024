# Smoggy app.

Спаси го твојот виртуелен аватар од загадувањето додека го заштитуваш и вистинскиот свет! 
Преку интерактивни таскови како користење еко-превоз, избегнување загадени зони, носење на маска и извршување на различни daily tasks, освојувај поени и надградувај го својот аватар. 
Следи ја состојбата на воздухот преку точни прогнози, интерактивна мапа и персонализирани совети за заштита од загадувањето, додека ти си во мисија за поздрава околина – и реална, и виртуелна! 

## Installation

To install this project, follow these steps:

1. Clone the repository to your local machine:
    ```
    git clone https://github.com/geeloov/codefu-2024/  
    ```

2. Navigate into the project directory:
    ```
    cd codefu-2024
    ```

3. Generating .env file and configuring DB:
   • Copy the content inside .env.example file. 
   • Make .env file and place the copied content in it.
   • For the .env key use:
   ```
   php artisan key:generate
   ```
   • In .env file you need DB_DATABASE (use codefu-2024 name)
   ```
   DB_DATABASE= 
   ```
   • Use this into .env file (for security reasons we won`t provide them)
    ```
    GOOGLE_CLIENT_ID=
    GOOGLE_CLIENT_SECRET=
    GOOGLE_REDIRECT=

    FACEBOOK_CLIENT_ID=
    FACEBOOK_CLIENT_SECRET=
    FACEBOOK_REDIRECT=
    
    ```

3.1 Install Dependencies and Start the Laravel Project:

    ```
    npm install # Install Node.js dependencies  
    composer install # Install PHP dependencies  
    npm run dev # Build the frontend
    php artisan migrate:fresh --seed # Populating the DB
    php artisan serve # Start the Laravel server 
    
    ```

4. Start the Map API. Run the Map API server located at /Map/server.js .
    ```
    node ./server.js
    ```
    
5. Start the Pollution Forecast API. Run the Flask API for pollution forecasting located at: /pollution_forecast_model/forecast/flask_api.py .
    ```
    python flask_api.py
    ```

6. Set Background Based on Current Weather. Run the weather background script located at:  /pollution_forecast_model/forecast/weather.py .
    ```
    python ./weather.py
    ```

7. Enable Face Recognition. Run the face recognition API located at:  /python-flask-api-for-face-recogniton .
    ```
    python ./app.py
    ```
    You need to download model: https://drive.google.com/file/d/1UiRYvSTjF0AeCvnEh3k-cppXGUKpqwC-/view?usp=drive_link. Put it in the same folder.

---

🌟 **Thank you for joining the Smoggy App mission! Together, we can make the virtual and real world cleaner, healthier, and more sustainable. Start your journey today and be the change!** 🌍✨  

