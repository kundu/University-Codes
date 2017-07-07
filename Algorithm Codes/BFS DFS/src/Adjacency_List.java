import java.io.File;
import java.util.Scanner;

public class Adjacency_List {
	public static void main(String[] args) {
		try {
			Work w = null;
			File f = new File("input.txt");
//			File f = new File("input.txt");
			Scanner k = new Scanner(f);
			while (k.hasNext()) {
//				int m = k.nextInt();
//				int n = k.nextInt();
				while (k.hasNext()) {
//					m = k.nextInt();
//					n = k.nextInt();
					
					Object m=k.next();
					Object n=k.next();
					w = new Work(m, n);
				}
			}

			w.print();
		} catch (Exception e) {
			System.out.println("There might be some problem "+e);
		}
	}

	public static class Work {
		public static Member head, tail;

		public Work(Object e, Object v) {
			if (head == null) {
				Member family = new Member(e, null, null);
				head = family;
				tail = family;
				Member neighbour = new Member(v, null);
				family.neighbour = neighbour;
				if (check(v, e)) {

				} else {
					Member family1 = new Member(v, null, null);
					tail.next = family1;
					tail = family1;
					Member neighbour1 = new Member(e, null);
					family1.neighbour = neighbour1;
				}
			} else {
				if (check(e, v)) {

				} else {
					Member family = new Member(e, null, null);
					tail.next = family;
					tail = family;
					Member neighbour = new Member(v, null);
					family.neighbour = neighbour;
				}
				if (check(v, e)) {

				} else {
					Member family1 = new Member(v, null, null);
					tail.next = family1;
					tail = family1;
					Member neighbour1 = new Member(e, null);
					family1.neighbour = neighbour1;
				}
			}
		}

		public boolean check(Object e, Object v) {
			for (Member m = head; m != null; m = m.next) {
				if (m.value.equals(e)) {
					for (Member n = m; n != null; n = n.neighbour)
						if (n.neighbour == null) {
							Member m1 = new Member(v, null);
							n.neighbour = m1;
							return true;
						}
				}
			}
			return false;
		}

		public void print() {
			int count =0;
			for (Member m = head; m != null; m = m.next) {
				for (Member n = m; n != null; n = n.neighbour) {
					System.out.print(n.value);
					if (n.neighbour != null)
						System.out.print(" => ");
				}
				System.out.println();
				count++;
			}
			System.out.println();
			System.out.println("Total members : "+count);
		}
	}

	public static class Member {
		Object value;
		Member next;
		Member neighbour;

		public Member(Object value, Member next, Member neighbour) {
			this.value = value;
			this.next = next;
			this.neighbour = neighbour;
		}

		public Member(Object value, Member neighbour) {
			this.value = value;
			this.neighbour = neighbour;
		}

	}
}
