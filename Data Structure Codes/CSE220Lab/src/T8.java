import java.util.*;
public class T8 
{
	public static void main (String [] args)
	{
		Scanner k=new Scanner (System.in);
		System.out.println("length");
		int len=k.nextInt();
		int a[]=new int [len];
		int b[]=new int [len];
		System.out.println("A num");
		for (int c=0 ; c<a.length ; c++)
		{
			System.out.println("Enter A num");
			a[c]=k.nextInt();
			a[c]=a[c]*5;
		}
		System.out.println("\n B num");
		for (int c=0 ; c<b.length ; c++)
		{
			System.out.println("Enter B num");
			b[c]=k.nextInt();
		}
		int ans[]=new int [len];
		for (int c=0 ; c<ans.length ; c++)
		{
			ans[c]=a[c]-b[c];
		}
		System.out.println("\n Ans is");
		for (int c=0 ; c<ans.length ; c++)
		{
			System.out.print(ans[c]+" ");
		}
		
	}
}
