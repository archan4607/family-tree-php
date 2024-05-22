#include <stdio.h>
int main(){
  
	int i,j,array[100],n,temp=0;
	printf("Elements you want in bubble sort:- ");
	scanf("%d",&n);
	printf("\nInsert element in array:-\n",n);
	for(i=0; i<n; i++)
	{
		scanf("%d",&array[i]);
	}
	for(i=0; i<n-1; i++)
	{
		for(j=0; j<n-i; j++)
		{
			if(array[j]>array[j+1])
			{
				temp=array[j];
				array[j]=array[j+1];
				array[j+1]=temp;
			}
		}
	}
	printf("\nAfter Bubble Sort sorting method:-\n");
	for(i=0; i<n; i++)
	{
		printf("%d\n",array[i]);
	}
}