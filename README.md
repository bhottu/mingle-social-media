# Mingle v1.0.3 created by Nate Nasution <img src="https://github.githubassets.com/images/icons/emoji/unicode/1f1ee-1f1e9.png" alt="Saweria" width="30" />

Mingle is a simple social media application that allows users to share posts, like other people's posts, and interact through comments. This project was built using laravel framework and still under active development.

## Key Features
- Home feed to view latest posts from other users.
- Ability to create new posts with text and images.
- Like system to appreciate posts from others.
- Comment feature to interact with posts.

## New Features
- Editable profil
- Zoomable photos

## Upcoming Update
- (Fixed) Post order should be displayed with the most recent on top, orderBy('created_at', 'desc').
- (Fixed) Share button now records in the database but is not yet displayed on the sharer's profile.
- (Fixed) User names on the home feed are not clickable to their respective profiles.
- (Fixed) Editable profile (name, email, pass)
- (Fixed) Dark mode.
- (Still needs some improvements) Zoomable photos
- Every action such as commenting, liking, or sharing causes a page reload, scrolling back to the top. Quite bothersome when trying to comment while scrolling down :D
- View post details on a single page
- One-way chat
- Emoticon
- Story
- Marketplace


## Installation
1. Clone this repository to your local machine.
2. Open a terminal and navigate to the project directory.
3. Run `composer install` to install dependencies.
4. Copy `.env.example` file to `.env` and configure database settings.
5. Run `php artisan key:generate` to generate an application key.
6. Run `php artisan migrate` to run database migrations.
7. Run `php artisan serve` to start the local server.
8. If the image doesn't appear do this
   <pre>rm public/storage
   php artisan storage:link</pre>

## Contribution
If you wish to contribute to this project, please check the *Issues* tab for a list of tasks that need to be done. You can also submit a *Pull Request* with proposed changes.

## License
This project is licensed under the MIT License. See the `LICENSE` file for more details.

## Installation
1. Clone this repository to your local machine.
2. Open a terminal and navigate to the project directory.
3. Run `composer install` to install dependencies.
4. Copy `.env.example` file to `.env` and configure database settings.
5. Run `php artisan key:generate` to generate an application key.
6. Run `php artisan migrate` to run database migrations.
7. Run `php artisan serve` to start the local server.
8. If the image doesn't appear do this
   <pre>rm public/storage
   php artisan storage:link</pre>

## Contribution
If you wish to contribute to this project, please check the *Issues* tab for a list of tasks that need to be done. You can also submit a *Pull Request* with proposed changes.

## License
This project is licensed under the MIT License. See the `LICENSE` file for more details.

## Support / Donation

Hello everyone! 👋

Thank you for visiting my repository. I'm glad if this project is helpful to you. If you find it useful and would like to support its development or contribute to more useful open-source projects, you can make a donation.

Every donation you give will mean a lot, as a form of support to continue developing this project and creating more useful open-source projects.

<a href="https://saweria.co/bhottu" target="_blank">
    <img src="https://github.com/bhottu/nate-social-media/assets/35356275/b0a6053d-4033-467f-8578-e99abed81710" alt="Saweria" width="200" />
</a>

Thank you very much for your support and appreciation! 🙏

## Screenshots

<div style="display: flex; flex-wrap: wrap;">
  <div style="flex: 1 1 30%; margin: 5px;">
    <img src="https://github.com/bhottu/mingle-social-media/assets/35356275/cb14b9ff-ed46-44ea-9075-1c02f65ad082" alt="Screenshot 1" width="200"/>
  </div>
  <div style="flex: 1 1 30%; margin: 5px;">
    <img src="https://github.com/bhottu/mingle-social-media/assets/35356275/eb1258d4-c0db-4fde-80ab-6a0cdc278b5f" alt="Screenshot 2" width="200" />
  </div>
  <div style="flex: 1 1 30%; margin: 5px;">
    <img src="https://github.com/bhottu/mingle-social-media/assets/35356275/94ff1989-227c-42e1-8587-b2a2f7af98e3" alt="Screenshot 3" width="200" />
  </div>
  <div style="flex: 1 1 30%; margin: 5px;">
    <img src="https://github.com/bhottu/mingle-social-media/assets/35356275/f8aa2400-bd9d-4355-83a5-0a3b6c7de545" alt="Screenshot 4" width="200" />
  </div>
<div style="flex: 1 1 30%; margin: 5px;">
    <img src="https://github.com/bhottu/mingle-social-media/assets/35356275/9dc211a7-f50c-408f-8959-4b32a410f89d" alt="Screenshot 4" width="200" />
  </div>
<div style="flex: 1 1 30%; margin: 5px;">
    <img src="https://github.com/bhottu/mingle-social-media/assets/35356275/9051cd75-5a80-405b-b67f-c857ac7566eb" alt="Screenshot 4" width="200" />
  </div>
</div>
