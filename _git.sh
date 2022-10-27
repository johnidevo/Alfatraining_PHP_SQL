#!/bin/bash

git config --global user.email "danrobert445@gmail.com"
git config --global user.name "Robert-Dan"

git add .
git status

#"${FOO:=default value}"
read -p "Enter your commit message: " message

git commit -m "${message:=default value}"


git remote add origin https://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@github.com/johnidevo/Alfatraining_PHP_SQL.git
git push origin master

#git pull origin master


