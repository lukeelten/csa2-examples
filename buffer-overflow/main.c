#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(int argc, char **argv)
{
    if (argc < 2) return 1;
    
    char password[16];
    int checked = 0;
    
    strcpy(password, argv[1]);
    
    if (strcmp(password, "secretPassword") == 0) {
        checked = 1;
        printf("You password is correct. \n");
    } else {
        printf("Wrong password \n");
    }
    
    if (checked) {
        printf("\nSomething secret happens here!\n");
    }
    
    return 0;
}
