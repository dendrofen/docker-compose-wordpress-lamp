# Store Docker changes in Github

After making changes to files you would rather store your changes to github, so this is guide how to perform this in correct way.

1. Stop container before git commit
```bash
docker-compose stop
....
```

2. Make commit
```bash
....
git add .
git commit -m "feat: new docker changes"
git push
....
```

3. Start container after commit to continue work with
```bash
...
docker-compose start
```

## Database versions, commits merge

As far database data contains binary files, it should be understood that merging commits will cause the database data to be overwritten relative to the latest version.

## Why stoping container?

Database is live changing system, it makes changes even if you are not changing database data yourself. Moreover database core has some states in work, which are different for actions like: stop container, container runing, start container...
So it's important to stop container so database correctly pack itself in local project directory.

Rest of guideline is same as for text-files only project.



