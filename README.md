![preview.jpg](readme/preview.jpg)

# Docker Compose LAMP - WordPress

Docker Compose project to deploy development environment for WordPress. Configured to store database and files changes locally in project folder matching the purpose of completely storing project in github. Additionally empowered with database manage module and php upload config files.

## Features
- 📦 WordPress and PHPMyAdmin from the box
- 🗂️ Database and file changes storing in project folder 
- 🚀 Commit changes to github repository

**For development purpose only, don't use in production.**


## 🚀 Getting Started

### 1. Clone repository

```bash
git clone https://github.com/dendrofen/docker-compose-wordpress-lamp.git
```

### 2. Docker compose

Run docker compose in cloned project folder

```bash
docker-compose up -d
```

### 3. Start your changes

Once docker-compose run completed, modules gonna create new folders in our project folder, wait untill it's over and you can perform changes to source code or manage WordPress admin side.

<img src="readme/install-folders-generated.png" alt="install-folders-generated.png" width="300">


## 🔗 Interface links

- __PHPMyAdmin__
  - [http://localhost:8080/](http://localhost:8080/)

| type  | login  | password |
| ------------- | ------------- | ------------- |
| Regular  | user  | user  |
| Root  | user  | root  |

- **WordPress**
    - [http://localhost/](http://localhost/)


## 🧑🏻‍💻 WordPress Environment

### Project Structure
After docker-compose run, next files structure would be created after WordPress initialized, next you can edit these files and folders to perform project changes.

### Persisted wp-content
Changes per this directory would be synced with docker container as normally called - volume persistance. Your changes would be live-synced with docker container and visa-versa.

<img src="readme/wordpress-files.png" alt="wordpress-files.png" width="300">

### PHP settings

**.docker/uploads.ini** file includes settings for php upload media limitations, and scripts processing.

❗️ **Note:** Reload the container to see changes (more in [FAQs](#🛟-faqs))

## 🧑🏻‍💻 Database Data

### Local storing

Database data files stored locally in *mariadb* project folder. 
All changes between database would be stored in this folder, so you are free to use this folder as database backup for container.

### Commiting state

More info about commiting database state [here](readme/github-store-changes.md) or in [FAQs](#🛟-faqs)

❗️ **Note:** Stop the container, before commiting database to github.


## 🛟 FAQs

### 🔷 Why default themes and plugins not commited to github?

There is .gitignore file configured to remove these items from repository. See below question.

### 🔷 WordPress default themes and plugins appears on container after been removed?

WordPress default themes and default plugins will appear in container each time *docker-compose up* command will be processed, because of WordPress latest version installation per each container construction. You can avoide such actions, using just *docker-compose start* and *docker-compose stop*. **There is also .gitignore** config to prevent these items to be commited.

### 🔷 PHP upload config updated, but no changes?

Changes will appear after container restart:
```bash
docker-compose restart
```

### 🔷 Can project changes being stored on github and reuse on another device with docker?

**Yes, and this is exactly what this repository is made for**. There is small guide how to correctly push changes using this project stack.

[Store changes using Github](readme/github-store-changes.md)
