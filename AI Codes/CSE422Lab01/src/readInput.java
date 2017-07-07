import java.io.File;
import java.util.Scanner;
import java.util.StringTokenizer;


public class readInput {
	public Object starting, destination;
	public void reading(){
		try {
			Object city, road;
			File f = new File("input.txt");
			Scanner k = new Scanner(f);
			int c = 1;
			while (k.hasNext()) {
				city = k.next();
				road = k.next();
				starting = k.next();
				destination = k.next();
//				System.out.print(city + " " + road + " " + starting + " "
//						+ destination + "\n");

				while (k.hasNext()) {
					Object a=null,b=null;
					try {
						String temp = k.nextLine() + "";
						StringTokenizer st = new StringTokenizer(temp, ",");
						while (st.hasMoreTokens()) {
							a=st.nextToken();
							b=st.nextToken();
							ALforMap aj=new ALforMap(a, b);
//							System.out.println(a);
//							System.out.println(b);
						}
					} catch (Exception e) {
					}
				}
			}
		} catch (Exception e) {
			System.out.println(e.toString());
		}
	}
	
	public void printFile(){
		try {
			File f=new File("input.txt");
			Scanner k=new Scanner(f);
			while(k.hasNext()){
				System.out.println(k.nextLine());
			}
		} catch (Exception e) {
			// TODO: handle exception
		}
	}
	
	public Object getSOurce(){
		return starting;
	}
	
	public Object getSDestination(){
		return destination;
	}
}
