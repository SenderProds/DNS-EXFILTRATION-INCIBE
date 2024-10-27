#!/bin/bash

num=1

cat base64 | while read line

do
	echo $line > ./temp.txt
	echo $num 
	base64 -d ./temp.txt
	num=$((num + 1))
done


