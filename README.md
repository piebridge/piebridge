piebridge
=========
部署文档

/home/code/build.sh
#!/bin/sh
#
# 代码发布脚本
#
#
code_path='/home/code/piebridge/'

web_root='/var/www/'

cd $code_path

git checkout master

git pull

cp -rf piebridge/* $web_root

cp -rf * /var/

rm -rf /var/piebridge/
