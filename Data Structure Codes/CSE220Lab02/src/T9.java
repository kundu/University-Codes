import java.util.Scanner;
public class T9 
{
	public static void main (String [] args)
	{
		Scanner k=new Scanner (System.in);
		int a[]={1,4,8,16,25,36,49,64,81,100};
		System.out.println("Give index");
		int n=k.nextInt();
		System.out.println("Your main array is ---------");
		for (int i=0 ; i<a.length ; i++)
		{
			System.out.print(a[i]+" ");
		}
		
		int temp=0;
		int v=0;
		int len=a.length;
		for (int i=n-1 ; i>=0 ; i--)
		{
			v=i;
			for (int c=i+1 ; c<len ; c++)
			{
				temp=a[c];
				a[c]=a[v];
				a[v]=temp;
				v++;
			}
			len--;
		}
		System.out.println("\nYour left rotate new array is ----------");
		for (int i=0 ; i<a.length ; i++)
		{
			System.out.print(a[i]+" ");
		}
		
	}
}
