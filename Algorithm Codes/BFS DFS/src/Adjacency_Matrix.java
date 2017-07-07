import java.io.File;
import java.util.*;
public class Adjacency_Matrix  {
	public static void main(String[] args) {
		try {
			File f=new File ("input.txt"); 
			Scanner k=new Scanner(f);
			 
			while(k.hasNext())
			{
				int n=k.nextInt();
				int m=k.nextInt();
				int[][] a=new int[n][n];
				while(k.hasNext())
				{
					n=k.nextInt();
					m=k.nextInt();
					a[n][m]=1;
					a[m][n]=1;
				}
				
				for (int c = 0; c < a.length; c++) {
					for(int i=0;i<a.length;i++)
					System.out.print(a[c][i]+" ");
					System.out.println();
					
				}
			}
			
		} catch (Exception e) {
			System.out.println(e);
		}
	}

}
