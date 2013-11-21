Commiting
=========

What is a Commit?
-----------------
It is the current snapshot of the files.  You are "committing" this snapshot into your working branch.  This is the heart of the versioning, as each commit creates a new "version" of the altered files.

Commit Messages
---------------
When you commit you usually (some platforms can enforce) add a message about this commit.  Make these meaningful so that you can help remeber what the commit was about or help others.

![alt text][GitHubCommits]


Diff!
-----
A diff will help you compare what was changed between two commits (two versions) of a file.

![alt text][GitHubDiff]


Rollback
--------
If there is a problem after a commit is made you may need to "rollback" to a previous commit.

Either run a "revert" in GitHub for Windows
-- or --
```
git reset HEAD

Which removes the last commit


Resources
---------
* http://cheat.errtheblog.com/s/git

[GitHubCommits]: images/GitHubCommits.png "Commits @GitHub"
[GitHubDiff]: images/GitHubDiff.png "Diff @GitHub"