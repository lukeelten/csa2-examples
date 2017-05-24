#include <stdio.h>
#include <string.h>

void granted() {
    printf("\nSomething really sensitive\n");
    return;
}

void testFunc(char** argv) {
    char password[16];
    
    strcpy(password, argv[1]);
    
    return;
}

int main(int argc, char **argv)
{
	
	testFunc(argv);
	

	return 0;
}
