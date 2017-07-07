import java.io.File;
import java.util.Scanner;
import java.util.StringTokenizer;


public class readInput {
	public static Object starting, destination;
	public void reading(){
		try {
			int dimension1 , dimension2;
			File f = new File("input.txt");
			Scanner k = new Scanner(f);
			int c = 1;
			while (k.hasNext()) {
				dimension1=k.nextInt();
				dimension2=k.nextInt(); 
				starting=k.next();
				destination=k.next();
				while(k.hasNext()){
					if(c<=dimension1){
						Object a=k.next();
						Object b=k.next();
						double d=k.nextDouble(); 
						ALforMap al=new ALforMap(a, b, d);
						c++;
					}
					else{
						Object a=k.next();
						double d=k.nextDouble();
						ALforMap al=new ALforMap(a,d);
					}
				}
				break;
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
			System.out.println(e.toString());
		}
	}
	
	public Object getSource(){
		return starting;
	}
	
	public Object getDestination(){
		return destination;
	}
}
