#!/bin/bash
gcc -o test -ggdb -fno-stack-protector -m32 -z execstack -no-pie main.c
