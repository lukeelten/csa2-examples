#!/bin/bash
gcc -o test -fno-stack-protector -m32 -z execstack -no-pie main.c
