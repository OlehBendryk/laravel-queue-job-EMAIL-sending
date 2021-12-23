
## Email Service

Run project:
- `git clone git@github.com:OlehBendryk/laravel-queue-job-EMAIL-sending.git`
- `cd EMAIL_Marketing`
- `docker-compose build`
- `docker-compose up`
<p>open a new terminal window and enter the container </p>

- `docker exec -it email_marketing_email_marketing_1 bash`

insert inside the container
- `composer install`
- `php artisan migrate:refresh --seed`
<p>now you have access to http://email.localtest.me/. </p> 
Your login credentials:

- login: `Admin@com`
- password: `121212`

If you send emails without a timestamp, the job is queued.

Run command to handle email sending job - **email sent and in the table email_sendings status = 1(true)**

`php artisan queue:listen` or `php artisan queue:work`

If you have a timestamp, the email saved with status = 0(false),
to send, open a new terminal window and enter the container 
where you run cron command, which checks the status of the email and the time of sending
`php artisan check:status`

email after sending you can see in the logs
