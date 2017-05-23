#include <stdio.h>
#include <string.h>

void granted() {
    printf("\nSomething really sensitive\n");
    return;
}

int main(int argc, char **argv)
{
    char password[16];
    
    strcpy(password, argv[1]);
    //gets(password);
    
    if (strcmp(password, "password") == 0) {
        granted();
    } else {
        printf("\nWrong password.\n");
    }
    
	return 0;
}