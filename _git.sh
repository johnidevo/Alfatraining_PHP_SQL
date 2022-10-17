git config --global user.email "danrobert445@gmail.com"
git config --global user.name "Robert-Dan"

git add .
git status

read -p "Enter your commit message: " message

git commit -m "${message}"
git remote add origin https://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@github.com/johnidevo/Alfatraining_PHP_SQL.git
git push origin master

#git pull origin master


